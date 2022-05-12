package com.example.securitysystemfordebitcreditcard;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;
import com.chaos.view.PinView;
import com.example.securitysystemfordebitcreditcard.utils.CheckInternet;
import com.example.securitysystemfordebitcreditcard.webservice.ApiCall;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class LogInActivity extends AppCompatActivity implements View.OnClickListener {
    EditText eTLogInPin;
    PinView firstPinView;
    Button btnLog, btnCreate;
    ImageView imgBack;
    RequestQueue requestQueue;
    SharedPreferences sharedPreferences;
    public static final String preferences = "preferences";
    String current, entered, accountNumber;
    ProgressDialog progressDialog;
    private EditText eTAccount;
    private ImageView ivPassToggle;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_log_in);
        requestQueue = Volley.newRequestQueue(getApplicationContext());
        init();
        clickButton();
        sharedPreferences = getSharedPreferences(preferences, this.MODE_PRIVATE);
//        SharedPreferences.Editor editor = sharedPreferences.edit();
//        editor.putBoolean("Card_Block", false);
//        editor.putBoolean("Card_Lost", false);
//        editor.apply();
        init();

        btnCreate.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(getApplicationContext(), RegisterActivity.class);
                startActivity(i);

            }
        });
        sharedPreferences = getSharedPreferences(preferences, this.MODE_PRIVATE);

        accountNumber = sharedPreferences.getString("account", "");
        if (!accountNumber.isEmpty()) {
            eTAccount.setText(accountNumber);
            eTAccount.setFocusable(false);
            eTAccount.setClickable(false);
            eTAccount.setCursorVisible(false);
        }else{
            eTAccount.setFocusable(true);
            eTAccount.setClickable(true);
            eTAccount.setCursorVisible(true);

        }


    }

    private void clickButton() {

        btnLog.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
//                firstPinView.setPasswordHidden(false);
                if (isVailid()) {
                    if (entered.length() < 4) {
                        Toast.makeText(LogInActivity.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();
                    } else {

                        register(entered, accountNumber);

                    }
//                    else
//                    {
//                        Toast.makeText(LogInActivity.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();
//                    }
                }
            }
        });
    }

    private boolean isVailid() {
        entered = firstPinView.getText().toString();
        accountNumber = eTAccount.getText().toString();
        if (entered.isEmpty()) {
            firstPinView.setError("Enter the login pin");
            return false;
        }
        if (accountNumber.isEmpty()) {
            eTAccount.setError("Enter the account number");
            return false;
        }
        current = sharedPreferences.getString("pin", "");

        return true;
    }

    private void init() {
        btnLog = findViewById(R.id.btnLog);
        imgBack = findViewById(R.id.imgBack);
        firstPinView = findViewById(R.id.firstPinView);
        eTAccount = findViewById(R.id.eTAccount);
        btnCreate = findViewById(R.id.btnCreate);
        ivPassToggle = findViewById(R.id.ivPassToggle);
        // eTLogInPin=findViewById(R.id.eTLogInPin);
        firstPinView.setAnimationEnable(true);
        ivPassToggle.setOnClickListener(this);
    }


    public void register(final String pin, final String accountNumber) {

        if (!CheckInternet.isConnectedNetwork(LogInActivity.this)) {
            Toast.makeText(LogInActivity.this, "Please connect to internet", Toast.LENGTH_SHORT).show();
            return;
        }
        progressDialog = new ProgressDialog(this);
        progressDialog.show();
        progressDialog.setContentView(R.layout.new_progress);
        progressDialog.getWindow().setBackgroundDrawableResource(android.R.color.transparent);

        ApiCall apiCall = new ApiCall();
        HashMap<String, String> params = new HashMap<>();
        params.put("pin", pin);
        params.put("account_num", accountNumber);
        apiCall.callApi(LogInActivity.this, ApiData.mpinExist, Request.Method.POST, params, response -> {
            try {
                progressDialog.dismiss();

                if (response.get("status").equals(true)) {
                    JSONObject dataObject = response.optJSONObject("data");
                    assert dataObject != null;
                    String accountId = dataObject.optString("accounts_is");
                    String accountNum = dataObject.optString("account_num");
                    String name = dataObject.optString("name");
                    String cardStatus = dataObject.optString("card_status");
                    String profileImage = dataObject.optString("profile_img");
                    boolean cardLockStatus = false;
                    boolean cardBlockStatus = false;
                    if (!cardStatus.isEmpty()) {
                        switch (cardStatus) {
                            case "0":
                                cardBlockStatus = true;
                                break;
                            case "2":
                                cardLockStatus = true;
                                break;
                        }
                    }
                    SharedPreferences.Editor editor = sharedPreferences.edit();
                    editor.putString("pin", pin);
                    editor.putString("account", accountNum);
                    editor.putString("userName", name);
                    editor.putString("accountId", accountId);
                    editor.putBoolean("Card_Block", cardBlockStatus);
                    editor.putBoolean("Card_Lost", cardLockStatus);
                    editor.putString("profile_img", profileImage);
                    editor.apply();
                    editor.commit();
                    Intent intent = new Intent(getApplicationContext(), Option2.class);
                    startActivity(intent);
                    finish();

                    Toast.makeText(LogInActivity.this, "Login Successful", Toast.LENGTH_SHORT).show();


                } else {
                    Toast.makeText(LogInActivity.this, "Enter correct login pin", Toast.LENGTH_LONG).show();


                }
            } catch (JSONException e) {
                e.printStackTrace();
            }

        }, error -> {
            progressDialog.dismiss();
            Toast.makeText(LogInActivity.this, error.getMessage(), Toast.LENGTH_SHORT).show();
        });


    }


    @Override
    public void onClick(View v) {
        if (v.getId() == R.id.ivPassToggle) {

            if(firstPinView.isPasswordHidden()){
                firstPinView.setPasswordHidden(false);
                ivPassToggle.setImageDrawable(getResources().getDrawable(R.drawable.ic_eye_pass));
            }else{
                firstPinView.setPasswordHidden(true);
                ivPassToggle.setImageDrawable(getResources().getDrawable(R.drawable.ic_eye_hide_pass));

            }
        }

    }
}