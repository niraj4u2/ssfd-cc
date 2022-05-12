package com.example.securitysystemfordebitcreditcard;

import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.chaos.view.PinView;

import java.text.DecimalFormat;

public class SeveralActivity extends AppCompatActivity implements View.OnClickListener {
    PinView firstPinView;
    Button btnSubmit;
    CardView cv;
    RelativeLayout imgBack;
    RelativeLayout rl1;
    TextView tv12;
    EditText eTAmount, eTFrequency;
    public static final String preferences = "preferences";
    SharedPreferences sharedPreferences;
    String current, entered, a, f;
    ImageView ivPassToggle;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        sharedPreferences = getSharedPreferences(preferences, this.MODE_PRIVATE);

        setContentView(R.layout.activity_several);
        init();
        clickButton();
    }

    private void init() {
        firstPinView = findViewById(R.id.firstPinView);
        btnSubmit = findViewById(R.id.btnSubmit);
        eTFrequency = findViewById(R.id.eTFrequency);
        eTAmount = findViewById(R.id.eTAmount);
       // cv = findViewById(R.id.cv);
       // tv12 = findViewById(R.id.tv12);
        imgBack = findViewById(R.id.imgBack);
        rl1=findViewById(R.id.rl1);
        ivPassToggle = findViewById(R.id.ivPassToggle);
        firstPinView.setAnimationEnable(true);
        ivPassToggle.setOnClickListener(this);
    }

    private void clickButton() {
        imgBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
        btnSubmit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                isVailid();
                if (isVailid() == true) {
                    if (entered.length() < 4) {
                        Toast.makeText(SeveralActivity.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();
                    } else if (current.equals(entered))
                    {
                        Intent intent=new Intent(getApplicationContext(),ChangePassActivity1.class);
                        intent.putExtra("op", "Option 8.");
                        DecimalFormat formatter = new DecimalFormat("#,###,###");
                        long num = Long.parseLong(eTAmount.getText().toString());
                        String yourFormattedString = formatter.format(num);
                        intent.putExtra("msg", "Only "+eTFrequency.getText().toString()+" transactions of \u20B9 "+yourFormattedString+"/- "+"each will be allowed.");
                        startActivity(intent);
                        finish();
                      //  tv12.setText("Only ATM transactions will be allowed\nfor specified amount and times only");

                    } else {
                        Toast.makeText(SeveralActivity.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();
                    }
                }
            }
        });
    }

    private boolean isVailid() {
        current = sharedPreferences.getString("pin", "");
        entered = firstPinView.getText().toString();
        a = eTAmount.getText().toString();
        f = eTFrequency.getText().toString();
        if (a.isEmpty()) {
            eTAmount.setError("Enter the amount");
            return false;
        }
        if (f.isEmpty()) {
            eTFrequency.setError("Enter the frequency");
            return false;
        }

        if (entered.isEmpty()) {
            firstPinView.setError("Enter the login pin");
            return false;
        }
        return true;

    }

    @Override
    public boolean onSupportNavigateUp() {
        onBackPressed();
        return true;
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