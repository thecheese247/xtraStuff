#include <assert.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#include "exam.h"

/*
 * Private function prototypes.
 */

static void _print_huffman_tree(const huffman_tree_t *, int);
static void _print_huffman_tree_codes(const huffman_tree_t *, char *, char *);

typedef struct code_entry{
    char letter;
    char* code;
} code_entry_t;

static code_entry_t *get_codes(huffman_tree_t *t, char *s, char *code, code_entry_t *codes);
/*
 * Prints the given Huffman tree.
 */
void print_huffman_tree(const huffman_tree_t *t) {
  printf("Huffman tree:\n");
  _print_huffman_tree(t, 0);
}

/*
 * Private helper function for print_huffman_tree.
 */
static void _print_huffman_tree(const huffman_tree_t *t, int level) {
  int i;
  for (i = 0; i <= level; i++) {
    printf("  ");
  }

  if (t->left == NULL && t->right == NULL) {
    printf("Leaf: '%c' with count %d\n", t->letter, t->count);
  } else {
    printf("Node: accumulated count %d\n", t->count);

    if (t->left != NULL) {
      _print_huffman_tree(t->left, level + 1);
    }

    if (t->right != NULL) {
      _print_huffman_tree(t->right, level + 1);
    }
  }
}

/*
 * Prints the codes contained in the given Huffman tree.
 */
void print_huffman_tree_codes(const huffman_tree_t *t) {
  printf("Huffman tree codes:\n");

  char *code = calloc(MAX_CODE_LENGTH, sizeof(char)), *code_position = code;
  if (code == NULL) {
    perror("calloc");
    exit(EXIT_FAILURE);
  }

  _print_huffman_tree_codes(t, code, code_position);
  free(code);
}

/*
 * Private helper function for print_huffman_tree_codes.
 */
static void _print_huffman_tree_codes(const huffman_tree_t *t,
                                      char *code, char *code_position) {

  if (t->left == NULL && t->right == NULL) {
    printf("'%c' has code \"%s\"\n", t->letter, code);
  } else if (t->left != NULL) {
    *code_position++ = 'L';
    *code_position = '\0';

    _print_huffman_tree_codes(t->left, code, code_position--);
  }

  if (t->right != NULL) {
    *code_position++ = 'R';
    *code_position = '\0';

    _print_huffman_tree_codes(t->right, code, code_position--);
  }
}

/*
 * Prints a list of Huffman trees.
 */
void print_huffman_tree_list(const huffman_tree_list_t *l) {
  printf("Huffman tree list:\n");

  for (; l != NULL; l = l->next) {
    print_huffman_tree(l->tree);
  }
}

/*
 * Frees a Huffman tree.
 */
void huffman_tree_free(huffman_tree_t *t) {
  if (t != NULL) {
    huffman_tree_free(t->left);
    huffman_tree_free(t->right);
    free(t);
  }
}

/*
 * Frees a list of Huffman trees.
 */
void huffman_tree_list_free(huffman_tree_list_t *l) {
  if (l != NULL) {
    huffman_tree_list_free(l->next);
    huffman_tree_free(l->tree);
    free(l);
  }
}

/*
 * Returns 1 if the string s contains the character c and 0 if it does not.
 */
int contains(char *s, char c) {
  for(int i=0; s[i]!='\0';i++){
    if(s[i] == c){
        return 1;
    }
  }
  return 0;
}

/*
 * Returns the number of occurrences of c in s.
 */
int frequency(char *s, char c) {
  int freq = 0;
  for(int i=0; s[i]!='\0'; i++){
    freq += (s[i] == c);
  }
  return freq;
}

/*
 * Takes a string s and returns a new heap-allocated string containing only the
 * unique characters of s.
 *
 * Pre: all strings will have fewer than or equal to MAX_STRING_LENGTH - 1
 *      characters.
 */
char *nub(char *s) {
  char *res = malloc((MAX_STRING_LENGTH - 1) * sizeof(char));
  memset(res, '\0', (MAX_STRING_LENGTH - 1));
  int res_index =0;
  
  for(int i=0; s[i]!='\0'; i++){
    if(!contains(res, s[i])){
        res[res_index] = s[i];
        res_index++;
    }
  }
  return res;
}

/*
 * Adds the Huffman tree t to the list l, returning a pointer to the new list.
 *
 * Pre:   The list l is sorted according to the frequency counts of the trees
 *        it contains.
 *
 * Post:  The list l is sorted according to the frequency counts of the trees
 *        it contains.
 */
huffman_tree_list_t *huffman_tree_list_add(huffman_tree_list_t *l,
                                            huffman_tree_t *t) {
    if(l==NULL || t->count < l->tree->count){
        //printf("add-if\n");
        huffman_tree_list_t *entry = malloc(sizeof(huffman_tree_list_t));
        entry->tree = t;
        entry->next = l;
        return entry;
    }else{
        //printf("add-else, before add\n");
        l->next = huffman_tree_list_add((l->next), t);
        //printf("add-else, after add\n");
        return l;
    }
}

/*
 * Takes a string s and a lookup table and builds a list of Huffman trees
 * containing leaf nodes for the characters contained in the lookup table. The
 * leaf nodes' frequency counts are derived from the string s.
 *
 * Pre:   t is a duplicate-free version of s.
 *
 * Post:  The resulting list is sorted according to the frequency counts of the
 *        trees it contains.
 */
huffman_tree_list_t *huffman_tree_list_build(char *s, char *t) {
  huffman_tree_list_t *l = NULL;
  huffman_tree_t *entry;
  
  for(int i=0; t[i]!='\0'; i++){
    //printf("in build loop\n");
    entry = malloc(sizeof(huffman_tree_t));
    
    entry->letter = t[i];
    entry->count = frequency(s, t[i]);
    entry->right = entry->left = NULL;
    
    l = huffman_tree_list_add(l, entry);
  }
  
  return l;
}

/*
 * Reduces a sorted list of Huffman trees to a single element.
 *
 * Pre:   The list l is non-empty and sorted according to the frequency counts
 *        of the trees it contains.
 *
 * Post:  The resuling list contains a single, correctly-formed Huffman tree.
 */
huffman_tree_list_t *huffman_tree_list_reduce(huffman_tree_list_t *l) {
  //printf("reducing...");
  if(l->next==NULL){
    return l;
  }else{
    huffman_tree_list_t *first = l;
    huffman_tree_list_t *second = l->next;
    l=l->next->next;
    
    huffman_tree_t *tree = malloc(sizeof(huffman_tree_t));
    tree->letter=' ';
    tree->count =(first->tree->count) + (second->tree->count);
    if((first->tree->count) < (second->tree->count)){
        tree->left = first->tree;
        tree->right = second->tree;
    }else{
        tree->left = second->tree;
        tree->right = first->tree;
    }
    free(first);
    free(second);
    //printf("reduce before add\n");
    l = huffman_tree_list_add(l, tree);
    //printf("reduce after add\n");
    return huffman_tree_list_reduce(l);
  }
}

/*
 * Accepts a Huffman tree t and a string s and returns a new heap-allocated
 * string containing the encoding of s as per the tree t.
 *
 * Pre: s only contains characters present in the tree t.
 */
 

 
char *huffman_tree_encode(huffman_tree_t *t, char *s) {
    char *res = malloc(MAX_CODE_LENGTH * strlen(s));
    code_entry_t *codes = malloc(strlen(s) * sizeof(code_entry_t));
    codes = get_codes(t, nub(s), "", codes);
    int res_pos = 0;
  
    for(int i=0; s[i]!='\0'; i++){
        for(int j=0; ;j++){
            if(codes[j].letter == s[i]){
                res[res_pos] = (*codes[j].code);
                res_pos += strlen(codes[j].code);
                break;
            }
        }
    }
    return res;
}

static code_entry_t *get_codes(huffman_tree_t *t, char *s, char *code, code_entry_t *codes){
    //if(t->left == NULL && t->right == NULL){
        
    //}else if(t->left == NULL){
    //    get_codes(huffman_tree_t *t, char *s, char *code, code_entry_t *codes)
    //}else if(t->right == NULL){
    //   
    //}else{
        
    //}
    
    return NULL;
}

/*
  Prints the codes contained in the given Huffman tree.
 
void print_huffman_tree_codes(const huffman_tree_t *t) {
  printf("Huffman tree codes:\n");

  char *code = calloc(MAX_CODE_LENGTH, sizeof(char)), *code_position = code;
  if (code == NULL) {
    perror("calloc");
    exit(EXIT_FAILURE);
  }

  _print_huffman_tree_codes(t, code, code_position);
  free(code);
}


  Private helper function for print_huffman_tree_codes.
 
static void _print_huffman_tree_codes(const huffman_tree_t *t,
                                      char *code, char *code_position) {

  if (t->left == NULL && t->right == NULL) {
    printf("'%c' has code \"%s\"\n", t->letter, code);
  } else if (t->left != NULL) {
    *code_position++ = 'L';
    *code_position = '\0';

    _print_huffman_tree_codes(t->left, code, code_position--);
  }

  if (t->right != NULL) {
    *code_position++ = 'R';
    *code_position = '\0';

    _print_huffman_tree_codes(t->right, code, code_position--);
  }
}
*/

/*
 * Accepts a Huffman tree t and an encoded string and returns a new
 * heap-allocated string contained the decoding of the code as per the tree t.
 *
 * Pre: the code given is decodable using the supplied tree t.
 */
char *huffman_tree_decode(huffman_tree_t *t, char *code) {
  char *res = malloc(t->count * sizeof(char));
  int res_index = 0;
  huffman_tree_t *curr = t;
 
  for(int i=0; code[i] != '\0'; i++){
    if(curr->left==NULL && curr->right==NULL){
        res[res_index] = curr->letter;
        res_index++;
        i--;
        curr = t;
    }else{
        curr = code[i] == 'L' ? curr->left : curr->right;
    }
  }
  
  return res;
}
