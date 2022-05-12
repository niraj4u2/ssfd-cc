package com.example.securitysystemfordebitcreditcard;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import java.util.List;


public class MyAdapter extends ArrayAdapter {
    Context context;
    List<String> listTitle;
    public MyAdapter(@NonNull Context context, List<String> title) {
        super(context, R.layout.items,title);
        this.listTitle=title;
        this.context=context;
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        View view= LayoutInflater.from(context).inflate(R.layout.items,parent,false);
        TextView textView=view.findViewById(R.id.tvfirst);
        textView.setText(listTitle.get(position));
        return  view;
    }
}
