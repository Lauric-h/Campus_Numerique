package edu.campnum.warriors.client.console;

import java.io.FileNotFoundException;
import java.nio.file.Paths;
import java.sql.SQLException;
import java.util.Scanner;


import edu.campnum.warriors.contracts.GameState;
import edu.campnum.warriors.contracts.Map;
import edu.campnum.warriors.contracts.GameStatus;
import edu.campnum.warriors.contracts.WarriorsAPI;
import edu.campnum.warriors.db.GsonReader;
import edu.campnum.warriors.engine.Warriors;
import edu.campnum.warriors.persona.Adventurer;


public class ClientConsole {
	
	private static String MENU_COMMENCER_PARTIE = "1";
	private static String MENU_QUITTER = "2";

	public static void main(String[] args) throws SQLException {

		WarriorsAPI warriors = (WarriorsAPI) new Warriors();
		Scanner sc = new Scanner(System.in);
		String menuChoice = "";
		do {
			menuChoice = displayMenu(sc);
			if(menuChoice.equals(MENU_COMMENCER_PARTIE)) {					
				startGame(warriors, sc);
			}			
		}while(!menuChoice.equals(MENU_QUITTER));
		sc.close();
		System.out.println("� bient�t");
	}

	private static void startGame(WarriorsAPI warriors, Scanner sc) {
		System.out.println();
		System.out.println("Entrez votre nom:");
		String playerName = sc.nextLine();
	
		System.out.println("Choisissez votre h�ro:");
		for(int i = 0; i < warriors.getHeroes().size(); i++) {
			Adventurer heroe = warriors.getHeroes().get(i);
			System.out.println(i+1 + " - " + heroe.getName() + " - " + ((Persona) heroe).getType());
			System.out.println("    Force d'attaque : " + heroe.getStrength());
			System.out.println("    Niveau de vie : " + heroe.getLife());
		}
		Adventurer chosenHeroe = warriors.getHeroes().get(Integer.parseInt(sc.nextLine()) - 1);
		
		System.out.println("Choisissez votre map:");
		for(int i = 0; i < warriors.getMaps().size(); i++) {
			Map map = warriors.getMaps().get(i);
			System.out.println(i+1 + " - " + map.getName());
		}
		Map choosenMap = warriors.getMaps().get(Integer.parseInt(sc.nextLine()) - 1);
		
		//================== fonctionne pas : ===========
		if (choosenMap.getName() == "Map debug") {
			System.out.println("map debug");
			try {
				System.out.println("hello");
				Scanner file = new Scanner(Paths.get("/home/lauric/Bureau/Java_Warriors_CodeDeBase/src/deb.csv").toFile());
				file.useDelimiter(",");
				while(file.hasNext()) {
					System.out.println(sc.next());
				}
			} catch (FileNotFoundException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		//==================================
		
		GameState gameState = warriors.createGame(playerName, chosenHeroe, choosenMap);
		String gameId = gameState.getGameId();

		while (gameState.getGameStatus() == GameStatus.IN_PROGRESS) {
			System.out.println(gameState.getLastLog());
			System.out.println("\nAppuyer sur une touche pour lancer le d�"); 
			if(sc.hasNext()) {
				sc.nextLine();
				gameState = warriors.nextTurn(gameId);
			}									
		}
		
		System.out.println(gameState.getLastLog());
	}

	private static String displayMenu(Scanner sc) {
		System.out.println();
		System.out.println("================== Java Warriors ==================");
		System.out.println("1 - Commencer une partie");
		System.out.println("2 - Quitter"); 
		if(sc.hasNext()) {
			String choice = sc.nextLine();
			return choice;
		}		
		
		return "";
	}
}

