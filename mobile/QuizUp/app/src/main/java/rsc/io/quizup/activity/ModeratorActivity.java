package rsc.io.quizup.activity;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import rsc.io.quizup.R;
import rsc.io.quizup.fragment.StartQuizFragment;

public class ModeratorActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_moderator);

        if(findViewById(R.id.start_quiz_fragment) != null){
            if (savedInstanceState != null) return;

            StartQuizFragment sqf = new StartQuizFragment();
            getSupportFragmentManager().beginTransaction().add(R.id.start_quiz_fragment, sqf).commit();

        }
    }




}
