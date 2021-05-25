package edu.campnum.warriors.board;

import edu.campnum.warriors.items.Item;

import javax.persistence.*;
import java.util.HashSet;
import java.util.Set;

@Entity
public class Cell {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    @Column(name = "CELL_ID")
    private Long id;
    @OneToOne(cascade = CascadeType.ALL)
    @JoinColumn()
    private Item item;

    private int cellNumber;

    private Set<BoardCell> boardCells = new HashSet<BoardCell>();

    protected Cell() {}

    public Cell(int cellNumber, Item item) {
        this.cellNumber = cellNumber;
        this.item = item;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public int getCellNumber() {
        return cellNumber;
    }

    public void setCellNumber(int cellNumber) {
        this.cellNumber = cellNumber;
    }

    public Item getItem() {
        return item;
    }

    public void setItem(Item item) {
        this.item = item;
    }

    @Override
    public String toString() {
        return "Cell{" +
                "id=" + id +
                ", cellNumber=" + cellNumber +
                ", onCell='" + item + '\'' +
                '}';
    }

    @OneToMany(mappedBy = "cell")
    public Set<BoardCell> getBoardCells() {
        return boardCells;
    }

    public void setBoardCells(Set<BoardCell> boardCells) {
        this.boardCells = boardCells;
    }
}
