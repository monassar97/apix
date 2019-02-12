package com.daoImp;

import com.dao.PersonDao;
import com.entities.Person;
import com.util.ConnectionConfaguration;

import java.sql.*;
import java.util.List;

public class PersonDaoImpl implements PersonDao {



    public void createPersonTable() {
        Connection connection=null;
        Statement stmt=null;

        try{
connection=ConnectionConfaguration.getConnection();
stmt=connection.createStatement();
stmt.execute("Create table person(id int primary key unique auto_increment," +
        "first_name varchar(55),last_name varchar (55))");
        }catch (Exception e){
            System.out.println(e);
        }finally {
            if (stmt != null) {
                try {
                    stmt.close();
                } catch (SQLException e) {
                    System.out.println(e);
                }
            }
            if (connection != null) {
                try {
                    connection.close();
                } catch (SQLException e) {
                    System.out.println(e);
                }
            }
        }
    }

    public void insert(Person person) {
        Connection connection=null;
        PreparedStatement stmt=null;

        try{
            connection=ConnectionConfaguration.getConnection();
            stmt=connection.prepareStatement("Insert into person (first_name,last_name)" +
                    "values (?,?)");
            stmt.setString(1,person.getFirstName());
            stmt.setString(2,person.getLastName());
            stmt.executeUpdate();
            System.out.println("Insert into person (first_name,last_name)" +
                    "values (?,?)");
        }catch (Exception e){
            System.out.println(e);
        }finally {
            if (stmt != null) {
                try {
                    stmt.close();
                } catch (SQLException e) {
                    System.out.println(e);
                }
            }
            if (connection != null) {
                try {
                    connection.close();
                } catch (SQLException e) {
                    System.out.println(e);
                }
            }
        }
    }

    public Person selectById(int id) {
        Person person=new Person();
        Connection connection=null;
        PreparedStatement stmt=null;
        ResultSet result=null;

        try{
            connection=ConnectionConfaguration.getConnection();
            stmt= (PreparedStatement) connection.createStatement();
            stmt=connection.prepareStatement("select * from person where id=? ");
            stmt.setInt(1,id);
            result=stmt.executeQuery();
            while (result.next()){
                person.setId(result.getInt(1));
                person.setFirstName(result.getString(2));
                person.setLastName(result.getString(3));
            }


        }catch (Exception e){
            System.out.println(e);
        }finally {
            if (result != null) {
                try {
                    result.close();
                } catch (SQLException e) {
                    System.out.println(e);
                }
            }
            if (stmt != null) {
                try {
                    stmt.close();
                } catch (SQLException e) {
                    System.out.println(e);
                }
            }
            if (connection != null) {
                try {
                    connection.close();
                } catch (SQLException e) {
                    System.out.println(e);

                }
            }
        }

        return null;
    }

    public List<Person> selectAll() {
        return null;
    }

    public void delete(int id) {

    }

    public void update(Person person, int id) {

    }
}
