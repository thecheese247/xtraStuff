import java.util.LinkedList;
import java.util.List;

/**
 * This class implements a min-heap abstract data type (as described by the
 * generic interface IMinHeap<T extends Comparable<T>>) using a fixed array of
 * size MinHeap.MAXIMUM_HEAP_SIZE.
 */
public class MinHeap<T extends Comparable<T>> implements IMinHeap<T> {

	private int MAXIMUM_HEAP_SIZE = 52;
	
	private int size = 0; 
	
	@SuppressWarnings("unchecked")
	private HeapEntry<T>[] heap = new HeapEntry[MAXIMUM_HEAP_SIZE];
	
	// add an element to the appropriate position of this min-heap.
	// Throw a HeapException if there is no more space on the heap.
	@Override
	public void add(T element) throws HeapException {
		if(size == MAXIMUM_HEAP_SIZE){
			throw new HeapException("Heap is full");
		}
		T curr = element;
		for(int i=0;  i<size; i++){
			if(heap[i] == null){
				heap[i] = new HeapEntry<T>(curr, i);
				break;
			}else if(curr.compareTo(heap[i].getItem()) == 0){
				break;
			}else if(curr.compareTo(heap[i].getItem()) < 0){
				T tmp = heap[i].getItem();
				heap[i] = new HeapEntry<T>(curr, i);
				curr = tmp;
			}
		}
		size++;
	}

	@Override
	public T removeMin() {
		T result = heap[size].getItem();
		heap[size] = null;
		size--;
		return result;
	}

	@Override
	public T getMin() {
		return heap[size].getItem();
	}

	@Override
	public boolean isEmpty() {
		return size==0;
	}

	@Override
	public int size() {
		return size;
	}

}