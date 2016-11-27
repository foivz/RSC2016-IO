package rsc.io.quizup.fragment;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.Toast;

import com.google.android.gms.auth.api.Auth;
import com.google.android.gms.auth.api.signin.GoogleSignInAccount;
import com.google.android.gms.auth.api.signin.GoogleSignInOptions;
import com.google.android.gms.auth.api.signin.GoogleSignInResult;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.api.GoogleApiActivity;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.common.api.GoogleApiClient.OnConnectionFailedListener;

import rsc.io.quizup.R;
import rsc.io.quizup.session.Session;

public class LoginFragment extends Fragment implements View.OnClickListener, OnConnectionFailedListener
{
    private static final int RC_LOGIN = 9001;

    private Button mLoginButton;
    private GoogleApiClient mGoogleApiClient;
    private Session mSession;

    public LoginFragment()
    {
    }

    @Override
    public void onViewCreated(View view, @Nullable Bundle savedInstanceState)
    {
        super.onViewCreated(view, savedInstanceState);
        initializeComponents();

        if (mSession.isRunning())
            Toast.makeText(getActivity(), "You're already logged in!", Toast.LENGTH_LONG).show();
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState)
    {
        return inflater.inflate(R.layout.fragment_login, container, false);
    }

    private void initializeComponents()
    {
        mLoginButton = (Button) getActivity().findViewById(R.id.googleLoginButton);
        mLoginButton.setOnClickListener(this);

        mSession = new Session(getActivity());

        GoogleSignInOptions gso = new GoogleSignInOptions.Builder(GoogleSignInOptions.DEFAULT_SIGN_IN)
            .requestEmail()
            .requestProfile()
            .build();

        mGoogleApiClient = new GoogleApiClient.Builder(getActivity())
            .enableAutoManage(getActivity(), this)
            .addApi(Auth.GOOGLE_SIGN_IN_API, gso)
            .build();
    }

    @Override
    public void onClick(View view)
    {
        Intent loginIntent = Auth.GoogleSignInApi.getSignInIntent(mGoogleApiClient);
        startActivityForResult(loginIntent, RC_LOGIN);
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data)
    {
        if (requestCode == RC_LOGIN)
        {
            GoogleSignInResult result = Auth.GoogleSignInApi.getSignInResultFromIntent(data);
            GoogleSignInAccount googleAccount = result.getSignInAccount();
            mSession.start(googleAccount.getDisplayName(), googleAccount.getEmail());
        }
    }

    @Override
    public void onConnectionFailed(@NonNull ConnectionResult connectionResult)
    {
        Toast.makeText(getActivity(), "Connection failed: " + connectionResult.getErrorMessage(), Toast.LENGTH_LONG).show();
    }
}
