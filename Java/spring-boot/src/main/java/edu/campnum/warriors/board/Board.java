package edu.campnum.warriors.board;

import edu.campnum.warriors.contracts.Map;

import javax.persistence.*;
import java.util.ArrayList;
@Entity
public class Board implements Map {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;
    protected String name;

    @OneToMany
    private ArrayList<Cell> cells = new ArrayList<Cell>();

    private boolean built = false;

    protected Board() {}

    public Board(String name, ArrayList<Cell> cells, boolean built) {
        this.name = name;
        this.cells = cells;
        this.built = built;
    }

    @Override
    public String getName() {
        return this.name;
    }

    @Override
    public int getNumberOfCase() {
        return this.cells.size();
    }

    @Override
    public String toString() {
        return "Board{" +
                "id=" + id +
                ", name='" + name + '\'' +
                ", cells=" + cells +
                ", built=" + built +
                '}';
    }
}
