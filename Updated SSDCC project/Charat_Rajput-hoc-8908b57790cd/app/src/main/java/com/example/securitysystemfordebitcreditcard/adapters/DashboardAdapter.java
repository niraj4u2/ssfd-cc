package com.example.securitysystemfordebitcreditcard.adapters;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.securitysystemfordebitcreditcard.listeners.ItemClickListener;
import com.example.securitysystemfordebitcreditcard.R;

import java.util.ArrayList;

public class DashboardAdapter extends RecyclerView.Adapter<DashboardAdapter.ViewHolder> {
    private final ArrayList<String> featureNames;
    private final ItemClickListener itemClickListener;

    public DashboardAdapter(ArrayList<String> featureNames, ItemClickListener itemClickListener) {
        this.featureNames = featureNames;
        this.itemClickListener = itemClickListener;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_dashboard, parent, false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        String featureName = featureNames.get(position);
        holder.txtFeatureName.setText(featureName);

    }

    @Override
    public int getItemCount() {
        return (featureNames != null) ? featureNames.size() : 0;
    }


    public class ViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {
        private final TextView txtFeatureName;

        public ViewHolder(View itemView) {
            super(itemView);
            txtFeatureName = itemView.findViewById(R.id.txtFeature);
            itemView.setOnClickListener(this);

        }


        @Override
        public void onClick(View v) {
            itemClickListener.onItemClicked("rv", getAdapterPosition());
        }
    }
}
