package com.example.securitysystemfordebitcreditcard;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
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

import java.util.HashMap;

public class RegisterActivity extends AppCompatActivity implements View.OnClickListener {
    private EditText eTName, eTAccount;
    String n, a;
    String pin;
    ImageView btnBlocked;

    ProgressDialog progressDialog;
    private Button btnSave;
    private PinView firstPinView;
    SharedPreferences sharedPreferences;
    RequestQueue requestQueue;
    private ImageView ivPassToggle;
    public static final String preferences = "preferences";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        //RegisterActivity.this.setTitle("Security System of Debit/Credit Card");
        requestQueue = Volley.newRequestQueue(getApplicationContext());
        init();
        clickButton();
        sharedPreferences = getSharedPreferences(preferences, this.MODE_PRIVATE);
        btnBlocked = findViewById(R.id.imgBack);

        btnBlocked.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();

            }
        });

    }

    private void init() {

        eTName = findViewById(R.id.eTName);
        eTAccount = findViewById(R.id.eTAccount);
        btnSave = findViewById(R.id.btnSave);
        firstPinView = findViewById(R.id.firstPinView);
        ivPassToggle = findViewById(R.id.ivPassToggle);
        firstPinView.setAnimationEnable(true);
        ivPassToggle.setOnClickListener(this);
    }

    private void clickButton() {
        btnSave.setOnClickListener(v -> {
            isVaild();
            if (isVaild() == true) {
                if (pin.length() < 4) {
                    Toast.makeText(RegisterActivity.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();
                } else {
                    n = eTName.getText().toString().trim();
                    a = eTAccount.getText().toString().trim();

                    register(n, a, pin);
                }
            }
        });
    }

    private Boolean isVaild() {
        pin = firstPinView.getText().toString();
        if (eTName.getText().toString().isEmpty()) {
            eTName.setError("Enter name");
            return false;
        }
        if (eTAccount.getText().toString().isEmpty()) {
            eTAccount.setError("Enter account number");
            return false;
        }else if(eTAccount.getText().toString().length()!=6){
            eTAccount.setError("Enter six digit account number");
            return false;
        }
        if (pin.isEmpty()) {
            firstPinView.setError("Enter login pin");
            return false;
        }

        return true;
    }

    public void register(String name, String account_number, String pin) {
        if (!CheckInternet.isConnectedNetwork(RegisterActivity.this)) {
            Toast.makeText(RegisterActivity.this, "Please connect to internet", Toast.LENGTH_SHORT).show();
            return;
        }
        progressDialog = new ProgressDialog(this);
        progressDialog.show();
        progressDialog.setContentView(R.layout.new_progress);
        progressDialog.getWindow().setBackgroundDrawableResource(android.R.color.transparent);

        ApiCall apiCall = new ApiCall();
        HashMap<String, String> params = new HashMap<>();
        params.put("name", name);
        params.put("pin", pin);
        params.put("account_num", account_number);
        apiCall.callApi(RegisterActivity.this, ApiData.save, Request.Method.POST, params, response -> {
            try {
                progressDialog.dismiss();

                if (response.get("status").equals(true)) {
                    SharedPreferences.Editor editor = sharedPreferences.edit();
                    editor.putString("name", n);
                    editor.putString("account", a);
                    editor.putString("pin", pin);
                    editor.apply();
                    editor.commit();

                    Intent intent = new Intent(getApplicationContext(), Card_Details.class);
                    startActivity(intent);
                    finish();


                    //  Toast.makeText(getApplicationContext(),""+response.getString("msg"), Toast.LENGTH_SHORT).show();

                } else {
                    Toast.makeText(getApplicationContext(), "User Already Exists", Toast.LENGTH_SHORT).show();

                }
            } catch (JSONException e) {
                e.printStackTrace();
            }

        }, error -> {
            progressDialog.dismiss();
            Toast.makeText(RegisterActivity.this, error.getMessage(), Toast.LENGTH_SHORT).show();
        });


    }

    @Override
    public void onClick(View v) {
        if (v.getId() == R.id.ivPassToggle) {

            if (firstPinView.isPasswordHidden()) {
                firstPinView.setPasswordHidden(false);
                ivPassToggle.setImageDrawable(getResources().getDrawable(R.drawable.ic_eye_pass));
            } else {
                firstPinView.setPasswordHidden(true);
                ivPassToggle.setImageDrawable(getResources().getDrawable(R.drawable.ic_eye_hide_pass));

            }
        }

    }
}