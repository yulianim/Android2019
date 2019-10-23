package com.ittg.unidad3;

import androidx.appcompat.app.AppCompatActivity;

import android.content.ContentValues;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {
    private EditText etId, etN, etAp;
    private Button btnG;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        etId=(EditText)findViewById(R.id.etControl);
        etN=(EditText)findViewById(R.id.etNombre);
        etAp=(EditText)findViewById(R.id.etApellidos);
        btnG=(Button)findViewById(R.id.btnGuardar);
    }
    public void guardar(View view){
        Admin admin= new Admin(this,
                "registro", null,1) ;
        SQLiteDatabase bd=admin.getWritableDatabase();
        String id=etId.getText().toString();
        String nombre=etN.getText().toString();
        String apellidos=etAp.getText().toString();
        ContentValues r=new ContentValues();
        r.put("id", id);
        r.put("nombre",nombre);
        r.put("apellidos", apellidos);
        bd.insert("alumno", null,r);
        bd.close();
        etId.setText("");
        etN.setText("");
        etAp.setText("");
        Toast.makeText(this, "Se guardaron correctamente los datos", Toast.LENGTH_SHORT).show();
    }
    public void consultarId(View v){
        Admin admin =new Admin(this,
                "registro",null, 1);
        SQLiteDatabase bd=admin.getWritableDatabase();
        String id=etId.getText().toString();
        Cursor fila=bd.rawQuery("select nombre, apellidos from alumno where id="+id, null);
        if(fila.moveToFirst()){
            etN.setText(fila.getString(0));
            etAp.setText(fila.getString(1));
        }
        else{
            Toast.makeText(this, "No existe el alumno", Toast.LENGTH_SHORT).show();
        }
        bd.close();

    }
}
