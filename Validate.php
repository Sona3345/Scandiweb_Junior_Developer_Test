<?php
      /**
      * This is the Validate interface used to initialise the validates functions.
      */
    Interface Validate {
        public function validateLetters(array $keys, array $values);
        public function validateNumbers(array $keys, array $values);
    }

?>