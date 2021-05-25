package edu.campnum.warriors.board;

import javax.persistence.*;

@Entity
public class BoardCell {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;
    private Board board;
    private Cell cell;

    private int cellNumber;

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    @Column(name = "BOARD_CELL_ID")
    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    @ManyToOne(cascade = CascadeType.ALL)
    @JoinColumn(name = "BOARD_ID")
    public Board getBoard() {
        return board;
    }

    public void setBoard(Board board) {
        this.board = board;
    }

    @ManyToOne(cascade = CascadeType.ALL)
    @JoinColumn(name = "CELL_ID")
    public Cell getCell() {
        return cell;
    }

    public void setCell(Cell cell) {
        this.cell = cell;
    }

    @Column(name = "CELL_NUMBER")
    public int getCellNumber() {
        return cellNumber;
    }

    public void setCellNumber(int cellNumber) {
        this.cellNumber = cellNumber;
    }
}
