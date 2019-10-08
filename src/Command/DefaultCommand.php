<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Entity\Polygon;
use App\Entity\Point;

class DefaultCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:obim';

    protected function configure()
    {
        
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $poligon1 = [
            [210,10],
            [250,190],
            [160,210]
        ];
        
        $poligon2 = [
            [400,20],
            [250,170],
            [170,210],
            [200,40]
        ];
        
        $poligon3 =  [
            [50,20],
            [40,10],
            [170,60],
            [48,40]
        ];
        $zz = new Point(7,5);
        function stranice($poligon) {
            $noviNiz = [];
            $obim = 0;
            for($i = 0; $i < count($poligon); $i++) {
                if($i < count($poligon) - 1){
                    $x = ( pow($poligon[$i+1][0]-$poligon[$i][0],2));
                    $y = ( pow($poligon[$i+1][1]-$poligon[$i][1],2));
                    $noviNiz[] += round( sqrt($x + $y) );
                } else {
                    $x = ( pow($poligon[0][0]-$poligon[$i][0],2));
                    $y = ( pow($poligon[0][1]-$poligon[$i][1],2));
                    $noviNiz[] += round( sqrt($x + $y) );
                }

            }
            return $noviNiz;
        }
        $poligoni = [];
        $poligoni[] = stranice($poligon1);
        $poligoni[] = stranice($poligon2);
        $poligoni[] = stranice($poligon3);
                
        function ObimPoligona($niz)
        {
            $nizObima = [];
            foreach($niz as $objekat) {
                $nizObima[] += array_sum($objekat);
            }
            arsort($nizObima);
            return $nizObima;
        }
        $obim = [];
        $obim = ObimPoligona($poligoni);
        $obim = json_encode($obim);
        file_put_contents('polygons.json', $obim);
        $output->writeln("Polygons sored by perimeter");
        
       
        var_dump($obim);
    }
}
