<?php

class Antithword extends BaseThword {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'thw_antithwords';

    public function findRandom() {

        $sql = "SELECT t.*
                FROM (SELECT ROUND(RAND() * (SELECT MAX(id) FROM thw_antithwords)) num, @num:=@num+1 FROM (SELECT @num:=0) AS a, thw_antithwords LIMIT 1) AS b,
                thw_antithwords AS t
                WHERE b.num = t.id";

        $cnt = 0;
        while (!($thword = DB::select(DB::raw($sql))) && ($cnt < 10)) {
            // try 10 times to get results and then give up
            $cnt = $cnt + 1;
        }

        return $thword;
    }


}