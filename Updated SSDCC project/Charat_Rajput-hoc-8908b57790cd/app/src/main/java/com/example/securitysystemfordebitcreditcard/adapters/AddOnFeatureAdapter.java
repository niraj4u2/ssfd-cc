package com.example.securitysystemfordebitcreditcard.adapters;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.securitysystemfordebitcreditcard.listeners.ItemClickListener;
import com.example.securitysystemfordebitcreditcard.R;
import com.example.securitysystemfordebitcreditcard.models.AddOnFeatureModel;

import java.util.ArrayList;

public class AddOnFeatureAdapter extends RecyclerView.Adapter<AddOnFeatureAdapter.ViewHolder> {
    private final ArrayList<AddOnFeatureModel> featureNames;
    private final ItemClickListener itemClickListener;

    public AddOnFeatureAdapter(ArrayList<AddOnFeatureModel> featureNames, ItemClickListener itemClickListener) {
        this.featureNames = featureNames;
        this.itemClickListener = itemClickListener;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_addon_feature, parent, false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        AddOnFeatureModel addOnFeatureModel = featureNames.get(position);
        String featureName=addOnFeatureModel.getFeatureName();
        String optionNumber=addOnFeatureModel.getOptionNumber();
        holder.txtFeatureName.setText(featureName);
        holder.txtNumber.setText(optionNumber);

    }

    @Override
    public int getItemCount() {
        return (featureNames != null) ? featureNames.size() : 0;
    }


    public class ViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {
        private final TextView txtFeatureName;
        private final TextView txtNumber;

        public ViewHolder(View itemView) {
            super(itemView);
            txtFeatureName = itemView.findViewById(R.id.txtFeature);
            txtNumber = itemView.findViewById(R.id.txtNumber);
            itemView.setOnClickListener(this);

        }


        @Override
        public void onClick(View v) {
            itemClickListener.onItemClicked("rv", getAdapterPosition());
        }
    }
}
