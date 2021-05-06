package game;

/**
 * Cell class 
 * Only used to build the board
 * @author lauric
 *
 */
public class Cell {
	private int cellNumber;
	private Object onCell;
	
	/**
	 * Constructor 
	 * @param cellNumber
	 * @param onCell
	 */
	public Cell(int cellNumber, Object onCell) {
		super();
		this.cellNumber = cellNumber;
		this.onCell = onCell;
	}
	
	/**
	 * Constructor with nothing on Cell
	 * Use this to generate empty cells on board
	 * @param cellNumber
	 */
	public Cell(int cellNumber) {
		this.cellNumber = cellNumber;
		this.onCell = null;
	}

	// Getters & Setters
	public int getCellNumber() {
		return cellNumber; 
	}

	public void setCellNumber(int cellNumber) {
		this.cellNumber = cellNumber;
	}

	public Object getOnCell() {
		return onCell;
	}

	public void setOnCell(Object onCell) {
		this.onCell = onCell;
	}	
}
