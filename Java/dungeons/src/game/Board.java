package game;

import java.util.ArrayList;
import character.*;
import item.*;

/**
 * Board game
 * @author lauric
 *
 */
public class Board {
	private ArrayList<Cell> boardCells;
	static final int START = 1;
	private int end;
	private int maxCells;
	
	/**
	 * Constructor
	 * Array of cells is constructed by method below
	 * @param cell
	 * @param end
	 * @param maxCells
	 * @throws Exception 
	 */
	public Board(int maxCells) throws Exception {
		super();
		this.boardCells = this.buildArray();
		this.end = maxCells;
		if (maxCells >= 64) {
			throw new Exception();
		} else {
			this.maxCells = maxCells;
		}	
	}
	
	public Board() {
		this.boardCells = this.buildArray();
		this.maxCells = 64;
		this.end = maxCells;
	}
	
	/**
	 * Builds the board game
	 * Adds new cell to the array of cells
	 * @return array of cells
	 */
	private ArrayList<Cell> buildArray() {
		for (int i = 1; i <= this.maxCells; i++) {
			this.boardCells.add(new Cell(i, this.generateRandomObject()));
		}
		return this.boardCells;
	}
	
	/**
	 * Builds array of cell
	 * Generates random numbers
	 * Each number corresponds to a class
	 * Null represents empty cell
	 * @return Object on cell
	 */
	private Object generateRandomObject() {
		int rand = (int)(Math.random()*(4-1+1)+1);
		Object onCell = null;
		switch(rand) {
			case 1:
				onCell = new Monster();
				break;
			case 2:
				onCell = new BearTrap();
				break;
			case 3:
				onCell= new Potion();
				break;
			case 4:
				onCell = null;
				break;
			default:
				onCell = new Monster();	;
		}
		return onCell;
	}

	// Getters and setters
	public ArrayList<Cell> getBoardCells() {
		return boardCells;
	}

	public void setBoardCells(ArrayList<Cell> boardCells) {
		this.boardCells = boardCells;
	}

	public int getEnd() {
		return end;
	}

	public void setEnd(int end) {
		this.end = end;
	}

	public int getMaxCells() {
		return maxCells;
	}

	public void setMaxCells(int maxCells) {
		this.maxCells = maxCells;
	}

	public static int getStart() {
		return START;
	}


}
