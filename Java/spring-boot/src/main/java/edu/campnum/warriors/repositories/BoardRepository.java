package edu.campnum.warriors.repositories;

import edu.campnum.warriors.board.Board;
import org.springframework.data.repository.CrudRepository;

public interface BoardRepository extends CrudRepository<Board, Long> {
}
