<?php
namespace utility;
class htmlTable
{
    public static function genarateTableFromMultiArray($array)
    {
        $tableGen = '<table border="1"cellpadding="10">';
        $tableGen .= '<tr>';
        //this grabs the first element of the array so we can extract the field headings for the table
        $fieldHeadings = $array[0];
        $fieldHeadings = get_object_vars($fieldHeadings);
        $fieldHeadings = array_keys($fieldHeadings);
        foreach ($fieldHeadings as $heading) {
            if ($heading != 'id') {
                $tableGen .= '<td>' . $heading . '</td>';
            }
        }
        $tableGen .= '</tr>';

        foreach ($array as $record) {
            $tableGen .= '<tr>';
            foreach ($record as $key => $value) {
                if ($key != 'id') {
                    $tableGen .= '<td>' . $value . '</td>';
                }
            }
            $tableGen .= '</tr>';
        }
        $tableGen .= '</table>';
        return $tableGen;
    }
}