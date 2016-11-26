package rsc.io.quizup.fragment;

import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import rsc.io.quizup.R;

public class LoginFragment extends Fragment implements View.OnClickListener
{
    private Button mLoginButton;

    public LoginFragment()
    {
    }

    @Override
    public void onViewCreated(View view, @Nullable Bundle savedInstanceState)
    {
        super.onViewCreated(view, savedInstanceState);
        initializeComponents();
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
    }

    @Override
    public void onClick(View view)
    {
        Toast.makeText(getActivity(), "Click...", Toast.LENGTH_LONG).show();
    }
}
