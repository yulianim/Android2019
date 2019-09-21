package com.example.calculadora;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    private EditText et1, et2;
    private RadioButton rb1, rb2, rb3, rb4;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        et1=(EditText)findViewById(R.id.etN1);
        et2=(EditText)findViewById(R.id.etN2);
        rb1=(RadioButton)findViewById(R.id.rbSumar);
        rb2=(RadioButton)findViewById(R.id.rbRestar);
        rb3=(RadioButton)findViewById(R.id.rbMultiplicar);
        rb4=(RadioButton)findViewById(R.id.rbDividir);

    }
    public void operacion(View view){
        int n1=Integer.parseInt(et1.getText().toString());
        int n2=Integer.parseInt(et2.getText().toString());
        int r;
        if(rb1.isChecked()==true){
            r=n1+n2;
            Toast.makeText(this, "Resultado: "+r, Toast.LENGTH_SHORT).show();
            }

    }
}
