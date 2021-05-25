package edu.campnum.warriors.db;

import java.sql.*;

/**
 * Singleton class to handle DB connections
 * @author lauric
 */
public class DatabaseConnection {
	private Statement statement;
	private Connection connection;
	private static DatabaseConnection instance;
	
	/**
	 * Private constructor
	 * Sets the connection
	 * @throws SQLException if no connection made
	 */
	private DatabaseConnection() throws SQLException {
		String url = "jdbc:mysql://localhost:3306/";
		String dbName = "java_cn";
		String username = "root";
		String password = "Campus06";
		
		try {
			this.connection = DriverManager.getConnection(url + dbName, username, password);
		} catch(Exception e) {
			System.out.println("Erreur de connection à la base de donnée : " + e.getMessage());
		}
	}

	/**
	 * Return the DB instance
	 * @return DatabaseConnection object
	 * @throws SQLException if no connection made
	 */
	public static DatabaseConnection getDbConnection() {
		try {
			if (instance == null) {
				instance = new DatabaseConnection();
			}
		} catch(SQLException e) {
			e.printStackTrace();
		}
		return instance;
	}
	
	/**
	 * @param query to get data from db
	 * @return ResultSet containing the result of query
	 * @throws SQLException if no connection made
	 */
	public ResultSet query(String query) throws SQLException {
		statement = instance.connection.createStatement();
		ResultSet res = statement.executeQuery(query);
		return res;
	}
	
	/**
	 * @param insertQuery query 
	 * @return boolean for the result of operation
	 * @throws SQLException if no connection made
	 */
	public int insert(String insertQuery) throws SQLException {
		statement = instance.connection.createStatement();
		int res = statement.executeUpdate(insertQuery);
		return res;
	}

}
