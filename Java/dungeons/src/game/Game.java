package game;

import java.util.ArrayList;

import character.*;
import item.*;
import menu.*;

public class Game {
	private boolean isStarted = false;
	private ArrayList<Adventurer> adventurers;
	private Adventurer playerAdventurer; 
	
	public Game(boolean isStarted) {
		super();
		this.isStarted = isStarted;
		this.adventurers = new ArrayList<Adventurer>();
		this.playerAdventurer = null;
	}
	
	/**
	 * Logging info in console to start game
	 * Useless so far, might delete later
	 */
	public void start() {
		System.out.println("Début du jeu...");	
	}

	/**
	 * Display all characters created
	 * @param array
	 */
	public void displayAdventurers() {
		System.out.println("Voici la liste des aventuriers que tu as créé");
		for (int i = 0; i < this.adventurers.size(); i++) {
			System.out.println((i+1) + "." + this.adventurers.get(i));
		}
	}
	
	/**
	 * Get array list of adventurers
	 * @return adventurers
	 */
	public ArrayList<Adventurer> getAdventurers() {
		return adventurers;
	}

	/**
	 * Get character chosen by player
	 * @return adventurer
	 */
	public Adventurer getPlayerAdventurer() {
		return playerAdventurer;
	}

	/**
	 * Sets the character chosen by player
	 * @param adventurers
	 * @param userChoice
	 */
	public void setPlayerAdventurer(int userChoice) {
		if (userChoice == 0) {
			this.displayAdventurers();
			return;
		}
		this.playerAdventurer = adventurers.get(userChoice - 1);
	}
	
	public void displayRules(int start, int end) {
		System.out.println("OK ! C'est parti pour une aventure de " + end + " cases !");
		System.out.println("Mais avant, un rappel des règles s'impose...");
		System.out.println("Tu débutes à la case " + start);
		System.out.println("Si tu arrives à la case " + end + " en vie, tu as gagné le jeu !");
		System.out.println("Mais attention ! Sur ta route tu trouveras de nombreux obstacles :");
		System.out.println("1. Les monstres, que tu devras combattre. Si tu gagnes, tu peux continuer, mais si tu perds, retour à la case départ !");
		System.out.println("2. Les pièges, ceux-là t'enlèvent un certains nombre de points de vie, une fois à 0, retour à la case départ !");
		System.out.println("Heureusement, tu trouveras des potions sur ton chemin pour remonter tes points de vie et arriver sain et sauf à l'arrivée...");
	}
}
