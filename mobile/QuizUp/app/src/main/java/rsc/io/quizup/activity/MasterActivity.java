package rsc.io.quizup.activity;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import rsc.io.quizup.R;
import rsc.io.quizup.fragment.LoginFragment;

public class MasterActivity extends AppCompatActivity
{
    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_master);

        if (findViewById(R.id.fragment_container) != null)
        {
            if (savedInstanceState != null) return;

            LoginFragment loginFragment = new LoginFragment();

            getSupportFragmentManager()
                .beginTransaction()
                .add(R.id.fragment_container, loginFragment)
                .commit();
        }
    }
}
