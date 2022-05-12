package com.example.securitysystemfordebitcreditcard.webservice;

import static com.example.securitysystemfordebitcreditcard.utils.AppUtils.getFileData;

import android.content.Context;

import com.android.volley.NetworkResponse;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.File;
import java.util.HashMap;
import java.util.Map;

public class ApiCall {
    RequestQueue requestQueue;


    public void callApi(Context context, String Url, int requestType, HashMap<String, String> params, Response.Listener<JSONObject> listener, Response.ErrorListener errorListener) {

        requestQueue = Volley.newRequestQueue(context);
        JSONObject jsonObject = new JSONObject();
        for (String key : params.keySet()) {
            try {
                jsonObject.put(key, params.get(key));
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
        JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(requestType, Url, jsonObject, listener, errorListener);
        requestQueue.add(jsonObjectRequest);

    }
    public void callImageUploadApi(Context context, String urlPath, File file, int requestType, HashMap<String, String> params, Response.Listener<NetworkResponse> listener, Response.ErrorListener errorListener) {

        requestQueue = Volley.newRequestQueue(context);
        VolleyMultipartRequest volleyMultipartRequest = new VolleyMultipartRequest(requestType, urlPath,
               listener,errorListener) {

            @Override
            protected Map<String, String> getParams(){
                return params;
            }

            @Override
            protected Map<String, DataPart> getByteData() {
                Map<String, DataPart> params = new HashMap<>();
                params.put("profile_img", new DataPart("user.jpg", getFileData(file)));
                return params;
            }
        };    requestQueue.add(volleyMultipartRequest);

    }
}
