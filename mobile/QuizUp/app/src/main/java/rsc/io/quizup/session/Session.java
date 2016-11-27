package rsc.io.quizup.session;

import android.app.Activity;
import android.content.Context;
import android.content.SharedPreferences;

public class Session
{
    private static final String SESSION_PREFERENCES = "SESSION_PREFERENCES";
    private Context mContext;

    public Session(Context context)
    {
        mContext = context;
    }

    public void start(String displayName, String email)
    {
        SharedPreferences preferences = mContext.getSharedPreferences(SESSION_PREFERENCES, 0);
        SharedPreferences.Editor editor = preferences.edit();
        editor.putString("display_name", displayName);
        editor.putString("email", email);
    }

    public void end()
    {
        SharedPreferences preferences = mContext.getSharedPreferences(SESSION_PREFERENCES, 0);
        SharedPreferences.Editor editor = preferences.edit();
        editor.clear();
        editor.commit();
    }

    public boolean isRunning()
    {
        SharedPreferences preferences = mContext.getSharedPreferences(SESSION_PREFERENCES, 0);
        return preferences.contains("display_name") && preferences.contains("email");
    }
}
