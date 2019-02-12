package com.util;

import java.sql.Connection;
import java.sql.DriverManager;

public class ConnectionConfaguration {
    public static Connection getConnection(){
        Connection connection=null;

        try {
Class.forName("com.mysql.jdbc.Driver");
connection=DriverManager.getConnection("jdbc:mysql://localhost:3306/company","root","12345678");
        }catch (Exception e){
            System.out.println(e);
        }
        return connection;
    }
}
