package com.example.securitysystemfordebitcreditcard;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;

import androidx.appcompat.app.AppCompatActivity;

public class LostActivity1 extends AppCompatActivity {
    Button btnReset;
    ImageView imgBack;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_change_pass1);
        init();

    }

    private void init() {
        imgBack = findViewById(R.id.imgBack);
        btnReset = findViewById(R.id.btnReset);

        imgBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(),Option2.class);
                startActivity(intent);
                finish();
            }
        });
        btnReset.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(),Option2.class);
                startActivity(intent);
                finish();

            }
        });
    }
}