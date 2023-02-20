package controlador;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.FileInputStream;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.util.Properties;

import com.mysql.cj.jdbc.StatementImpl;
import com.mysql.cj.xdevapi.Statement;

/**
 * Servlet implementation class lisProveedores
 */
public class lisProveedores extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public lisProveedores() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
	    
	        try (PrintWriter out = response.getWriter()) {
	            
	            Properties prop = new Properties();
	            prop.load(new FileInputStream(request.getServletContext().getRealPath("bd.properties")));
	        
	            // Driver para MySQL
	            Class.forName("com.mysql.cj.jdbc.Driver");
	            
	            // Datos de conexión
	            String usuario = prop.getProperty("usuario");
	            String password = prop.getProperty("clave");
	            String url = "jdbc:mysql://" + prop.getProperty("host") + "/" + prop.getProperty("bd");
	            
	            System.out.println(url);
	              
	            Connection con = DriverManager.getConnection(url, usuario, password);
	            
	            StatementImpl stmt = (StatementImpl) con.createStatement();
	            String sqlStr = "SELECT * FROM proveedores ";

	            ResultSet rset = ((java.sql.Statement) stmt).executeQuery(sqlStr);
	            
	            while ( rset.next() ) {    
	                out.println(rset.getString("cif") + " " + rset.getString("nom_emp") + " " +
	                        rset.getString("direccion") + " " + rset.getString("poblacion"));      
	            }   
	           
	            // Cierre de recursos
	            rset.close();
	          //  stmt).close();
	            con.close(); 
	                                         
	        } catch (Exception e) {   
	            System.out.println(e.getMessage());
	        }           
	    }


	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
