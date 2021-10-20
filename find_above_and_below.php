 <?php
    /**
     * findAboveAndBelow
     * 
     * @param array $haystack 
     * @param int $middleNumber
     * 
     * @return string
     */
    function findAboveAndBelow(array$haystack, int$middleNumber) {
        // Declare our array returns. We shall count them later.
        $above = $below = [];

        foreach ($haystack as $hay) {
            if (
                //Bypass any php issues with var types. We want intergers only.
                is_integer($hay) &&
                //Make sure it is not equal. Equal is not above nor below
                $hay != $middleNumber
            ) {
                if ($middleNumber > $hay) {
                    array_push($above, $hay);
                } else {
                    array_push($below, $hay);
                }
            }
        }

        return "above: " .  count($above) . ", below: " . count($below);
    }

    $haystack = [1,1,3,4,5,4,3,'aa',3000000001,-2,25,7,8,9];
    $middle = 8;

    echo findAboveAndBelow($haystack, $middle);