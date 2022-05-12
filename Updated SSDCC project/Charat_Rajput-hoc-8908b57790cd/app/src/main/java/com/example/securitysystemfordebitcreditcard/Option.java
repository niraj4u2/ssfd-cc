package com.example.securitysystemfordebitcreditcard;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;

import java.util.ArrayList;
import java.util.List;

public class Option extends AppCompatActivity {
    ListView listView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_option);
        listView=(ListView)findViewById(R.id.listView);
        List<String> title=new ArrayList<>();
        title.add("1.  If the user wants to Change Password for Card\n(Debit card / Credit card)");
        title.add("2.   \n(Debit card / Credit card)");
        title.add("3.   \n(Debit card / Credit card)");
        title.add("4.   \n(Debit card / Credit card)");
        title.add("5.  ");
        title.add("6.  ");
        title.add("7.  Provides for One Shopping Transaction");
        title.add("8.  Provides multiple transaction for ATM and \nshopping with one pre-confirmation");
        title.add("9.  ");
        title.add("10. Provides for Card less Transaction for \nATM, Merchant and Online");
        title.add("11. Provides for Online Transaction Only");
        title.add("12. Provides for Multiple Shopping Transactions");

        MyAdapter myAdapter=new MyAdapter(this,title);
        listView.setAdapter(myAdapter);
        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

            }
        });

    }


}