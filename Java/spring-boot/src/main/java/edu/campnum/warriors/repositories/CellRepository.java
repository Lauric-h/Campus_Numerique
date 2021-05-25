package edu.campnum.warriors.repositories;

import edu.campnum.warriors.board.Cell;
import org.springframework.data.repository.CrudRepository;
import java.util.List;

public interface CellRepository extends CrudRepository<Cell, Long> {
    List<Cell> findByCellNumber(int cellNumber);
}
