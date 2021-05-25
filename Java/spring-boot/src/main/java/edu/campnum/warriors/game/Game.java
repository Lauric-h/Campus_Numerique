package edu.campnum.warriors.game;

import edu.campnum.warriors.contracts.GameStatus;
import edu.campnum.warriors.contracts.Map;
import edu.campnum.warriors.contracts.Hero;
import edu.campnum.warriors.persona.Adventurer;
import edu.campnum.warriors.items.*;


/**
 * Game class
 * Implements GameState
 * Represents current state of the game
 * @author lauric
 *
 */
public class Game implements edu.campnum.warriors.contracts.GameState {
	private String playerName;
	private Adventurer hero;
	private Map map;
	private GameStatus gameStatus;
	private String gameId;
	private String lastLog;
	private int currentCase;
	
	/**
	 * Constructor
	 * Launches game by changing GameStatus
	 * @param playerName String
	 * @param hero character chosen
	 * @param map board chosen
	 */
	public Game(String playerName, Adventurer hero, Map map) {
		super();
		this.playerName = playerName;
		this.hero = hero;
		this.map = map;
		this.gameId = "1";
		this.gameStatus = GameStatus.IN_PROGRESS;
		this.currentCase = 1;
	}

	public String getPlayerName() {
		return playerName;
	}

	public Hero getHero() {
		return hero;
	}

	public Map getMap() {
		return map;
	}

	public String getGameId() {
		return gameId;
	}

	public GameStatus getGameStatus() {
		return gameStatus;
	}
	
	/**
	 * Change game status
	 * @param gameStatus sets status of game
	 */
	public void setGameStatus(GameStatus gameStatus) {
		this.gameStatus = gameStatus;
	}
	
	public int getCurrentCase() {
		return currentCase;
	}

	public String toString() {
		return "Game [playerName=" + playerName + ", hero=" + hero + ", map=" + map + ", gameStatus=" + gameStatus
				+ ", gameId=" + gameId + ", lastLog=" + lastLog + ", currentCase=" + currentCase + "]";
	}
	
	/**
	 * Get last position of player
	 * Displays game finished if position is end of board
	 */
	public String getLastLog() {
		this.lastLog = this.currentCase + "/64";
		if (this.gameStatus == GameStatus.FINISHED) {
			this.lastLog = "================== Partie terminée ================ \n ~~~~~~~~~~~~~~ Vous avez gagné ! ~~~~~~~~~~~~~~";
		}
		return lastLog;
	}	

	/**
	 * Defines current cell where player is
	 * If current cell is 64, ends game
	 * @param currentCase int 
	 */
	public void setCurrentCase(int currentCase) {
		// Ends game if player reaches 64
		if (currentCase >= 64) {
			currentCase = 64;
			this.gameStatus = GameStatus.FINISHED;
			return;
		}
		this.currentCase = currentCase;
	}
	
	/**
	 * Checks what's on the current cell
	 * Either empty, bonus(item) or fight 
	 * @param onCell Object of what's on the cell
	 */
	public void checkCell(Object onCell) {
		if(onCell instanceof Adventurer) {
			Fight fight = new Fight((Persona) onCell, (Persona) this.hero);
			fight.fight();
			if (this.hero.getLife() <= 0) {
				System.out.println("Vous avez perdu ! Partie terminée !");
				this.gameStatus = GameStatus.FINISHED;
			}
		}
		if (onCell instanceof Item) {
			System.out.println("Vous êtes tombé sur un " + ((Item) onCell).getName());
			this.checkBonus((Item) onCell);
			System.out.println("Vous reprenez votre chemin..."); 
		}		
		if (onCell == null) {
			System.out.println("Vous êtes tombé sur une case vide");
			System.out.println("Continuez votre chemin...");
		}
	}
	
	/**
	 * Checks the item on the cell 
	 * @param item attack or potion
	 */
	private void checkBonus(Item item) {
		if (item instanceof Weapon || item instanceof Spell) {
			this.addAttack(item);
		}
		if (item instanceof Potion) {
			this.addPotion((Potion) item);
		}
	}
	
	/**
	 * Checks if hero can get the item
	 * Adds bonus to hero
	 * @param item weapon or spell
	 */
	private void addAttack(Item item) {
		if ((this.hero instanceof Wizard && item instanceof Spell) ||
			(this.hero instanceof Soldier && item instanceof Weapon)) {
			this.hero.setStrength(this.hero.getStrength() + item.getBonus());
			System.out.println("Vous faites maintenant " + this.hero.getStrength() + " dégâts.");
		} else {
			System.out.println("Vous ne pouvez pas prendre cet objet !");
		}
	}
	
	/**
	 * Adds life to hero
	 * @param potion kind of potion
	 */
	private void addPotion(Potion potion) {
		this.hero.setLife(this.hero.getLife() + potion.getBonus());
		System.out.println("Vous avez maintenant " + this.hero.getLife() + " points de vie.");
	}
	
	
}
