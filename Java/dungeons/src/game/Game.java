package game;

import java.util.ArrayList;

import character.*;
import menu.*;
import weapon.*;

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
}
