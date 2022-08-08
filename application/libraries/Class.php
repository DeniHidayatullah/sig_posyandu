<?php
// Note, this cannot be namespaced for the time being due to how CI works
//namespace Restserver\Libraries;

defined('BASEPATH') OR exit('No direct script access allowed');

class Edge {

	public $start;
	public $end;
	public $weight;

	public function __construct($start, $end, $weight) {
		$this->start = $start;
		$this->end = $end;
		$this->weight = $weight;
	}
}

class Graph {

	public $nodes = array();

	public function addedge($start, $end, $weight = 0) {
		if (!isset($this->nodes[$start])) {
			$this->nodes[$start] = array();
		}
		array_push($this->nodes[$start], new Edge($start, $end, $weight));
	}

    public function removenode($index) {
		array_splice($this->nodes, $index, 1);
	}


	public function paths_from($from) {
		$dist = array();
		$dist[$from] = 0;

		$visited = array();

		$previous = array();

		$queue = array();
		$Q = new PriorityQueue("compareWeights");
		$Q->add(array($dist[$from], $from));

		$nodes = $this->nodes;

		while($Q->size() > 0) {
			list($distance, $u) = $Q->remove();

			if (isset($visited[$u])) {
				continue;
			}
			$visited[$u] = True;

			if (!isset($nodes[$u])) {
				print "Peringatan: '$u' tidak ditemukan dalam list node\n";
				break;
			}

			foreach($nodes[$u] as $edge) {

				$alt = $dist[$u] + $edge->weight;
				$end = $edge->end;
				if (!isset($dist[$end]) || $alt < $dist[$end]) {
					$previous[$end] = $u;
					$dist[$end] = $alt;
					$Q->add(array($dist[$end], $end));
				}
			}
		}
		return array($dist, $previous);
	}

	public function paths_to($node_dsts, $tonode) {

		$current = $tonode;
		$path = array();

		if (isset($node_dsts[$current])) {
			array_push($path, $tonode);
		}
		while(isset($node_dsts[$current])) {
			$nextnode = $node_dsts[$current];

			array_push($path, $nextnode);

			$current = $nextnode;
		}
		return array_reverse($path);
	}

	public function getpath($from, $to) {
		list($distances, $prev) = $this->paths_from($from);
		return $this->paths_to($prev, $to);
	}

}

function compareWeights($a, $b) {
	return $a->data[0] - $b->data[0];
}

class PriorityList {
	public $next;
	public $data;
	function __construct($data) {
		$this->next = null;
		$this->data = $data;
	}
}

class PriorityQueue {

	private $size;
	private $liststart;
	private $comparator;

	function __construct($comparator) {
		$this->size = 0;
		$this->liststart = null;
		$this->listend = null;
		$this->comparator = $comparator;
	}

	function add($x) {
		$this->size = $this->size + 1;

		if($this->liststart == null) {
			$this->liststart = new PriorityList($x);
		} else {
			$node = $this->liststart;
			$comparator = $this->comparator;
			$newnode = new PriorityList($x);
			$lastnode = null;
			$added = false;
			while($node) {
				if ($comparator($newnode, $node) < 0) {

					$newnode->next = $node;
					if ($lastnode == null) {

						$this->liststart = $newnode;
					} else {

						$lastnode->next = $newnode;
					}
					$added = true;
					break;
				}
				$lastnode = $node;
				$node = $node->next;
			}
			if (!$added) {

				$lastnode->next = $newnode;
			}
		}

	}

	function debug() {
		$node = $this->liststart;
		$i = 0;
		if (!$node) {
			print "<< Tidak ada nodes >>\n";
			return;
		}
		while($node) {
			print "[$i]=" . $node->data[1] . " (" . $node->data[0] . ")\n";
			$node = $node->next;
			$i++;
		}
	}

	function size() {
		return $this->size;
	}

	function peak() {
		return $this->liststart->data;
	}

	function remove() {
		$x = $this->peak();
		$this->size = $this->size - 1;
		$this->liststart = $this->liststart->next;

		return $x;
	}
}