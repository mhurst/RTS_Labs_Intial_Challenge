 <?php
   /**
   * rotateCharactersInString
   * 
   * @param string $string 
   * @param int $rotateNumber
   * 
   * @return string
   */

   function rotateCharactersInString(string$string, int$rotateNumber) {
      $stringLength = strlen($string);

      if ($rotateNumber < $stringLength) {
        $preset = substr($string, 0, -$rotateNumber);
        $offset = substr($string, -$rotateNumber);

        return $offset.$preset;
      } else {
         throw new Exception('Invalid: Rotate number is larger then the string', 100);
      }
   }

   $string = 'MattHurst';
   $rotateNumber = 10;

   echo rotateCharactersInString($string, $rotateNumber);