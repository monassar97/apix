import com.daoImp.PersonDaoImpl;
import com.entities.Person;
import com.mysql.cj.jdbc.util.TimeUtil;
import com.util.ConnectionConfaguration;

import java.sql.Connection;
import java.sql.SQLException;

public class App {
    public static void main(String[] args) {
        PersonDaoImpl pdi=new PersonDaoImpl();
        //pdi.createPersonTable();

        //Person p=new Person("ahmad","ali");
        //pdi.insert(p);

       // Person p=pdi.selectById(1);
       // System.out.println(p.getLastName()+p.getFirstName());


    }
}
