<?php

namespace Database\Seeders;

use App\Models\clausula;

use Illuminate\Database\Seeder;

class ClausulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        $clausulas = [
            [1,'1','Primera','La empresa Opciones S.A. Sistema de Información, se adjudicó la Licitación Pública para la contratación del suministro denominado "Arriendo de Computadores Desktops para la Universidad del Sur", según da cuenta el Decreto Universitario exento Nº 1749 de fecha 09 de marzo de 2015.'],
            [2,'2','Segunda','Por este acto e instrumento la empresa, da en arriendo a la Universidad del Sur, quien lo acepta para sí, 44 unidades de computadores Desktops, según perfil  1, y 64 unidades de computadores Desktops, según perfil  2 para la contratación del suministro denominado "Arriendo de Computadores Desktops para la Universidad del Sur", llevado a efecto través del Sistema de Información a cargo de la Dirección de Compras y Contratación Pública bajo el Nº de Adquisición 2888-2-LP15 en los términos señalados en el presente contrato.'],
            [3,'3','Tercera','La empresa se obliga a entregar a la Universidad del Sur, 44 unidades de computadores Desktops perfil 1, y 64 unidades de computadores Desktops perfil 2, dentro del plazo de 20 días hábiles, contados desde la total tramitación del acto administrativo que aprueba el presente contrato.

            Dicho plazo no será susceptible de prórroga, salvo caso fortuito o fuerza mayor, hecho valer por la empresa antes del vencimiento del plazo original y que haya sido debidamente ponderado y aceptado por la Universidad.
            '],
            [4,'4','Cuarta','La empresa se obliga a entregar los equipos que se arriendan, con la siguiente descripción técnica:

            Características Perfil 1
            
            •	Marca LENOVO
            •	Nombre del modelo ThinkCentre M93 Mini Torre
            •	Procesador lntel® Core i5-4690 ( 3,9 Ghz, 6 MB cache)
            •	TARJETA DE VIDEO 1024MB GTX 750 se
            •	Memoria RAM 8 GB 1600 MHz DDR3
            •	Dispositivo de Puntero Mouse y Teclado USB
            •	Disco Rígido 1 TB GB 7200 RPM S-ATA HDD
            •	Unidad Optica DVD+/-RW
            •	Formato Mini Torre
            •	6 puertos USB, 1 puerto de red RJ45, 2 Display port conector DVI
            •	Fuente de Poder de 280 Watts autosensing
            •	Sistema Operativo Windows 8 SL
            •	Monitor LEO 23 pulg DVI Wide
            •	Pad mouse
            •	Candado para monitor
            
            Características Perfil 2
            
            •	Marca LENOVO
            •	Nombre del modelo ThinkCentre M93 Mini Torre
            •	Procesador lntel® Core i?-4790 ( 3,6 Ghz, 8 MB cache)
            •	TARJETA DE VIDEO 1024MB GTX 750 se
            •	Memoria RAM 8 GB 1600 MHz DDR3
            •	Dispositivo de Puntero Mouse y Teclado USB
            •	Disco Rígido 1 TB GB 7200 RPM S-ATA HDD
            •	Unidad Optica DVD+/-RW
            •	Formato Mini Torre
            •	6 puertos USB, 1 puerto de red RJ45, 2 Display port conector DVI
            •	Fuente de Poder de 280 Watts autosensing
            •	Sistema Operativo Windows 8 SL
            •	Monitor LEO 23 pulg DVI Wide
            •	Pad mouse
            •	Candado para monitor
            '],
            [5,'5','Quinta','La empresa se obliga a entregar 26 unidades de computadores desktops perfil 1 y 65 unidades de computadores desktops perfil 2, en la Sede Concepción en el Departamento de Servicios Computacionales, Dirección de Informática, Avenida CHILE 9999, Concepción, a doña AAAAA AAAA y 18 unidades de computadores desktops perfil 1, en la Sede Valdivia en el Departamento de Servicios, Dirección de Informática, Avenida Andrés Bello sin, Valdivia, a don Miguel Lagos.

            Dicha entrega deberá ser acreditada con un documento de recepción conforme entregado por el Departamento de Servicios Computacionales, para la Sede Concepción y por el Departamento de Servicios, para la Sede Valdivia, al que según lo indicado corresponda la entrega y recepción de los equipos.
            '],

            [6,'6','Sexta','La empresa deberá presentar al momento de la entrega de los equipos que se arrienden, garantía del correcto funcionamiento de los equipos y de los que en definitiva se incorporen al contrato, ya sea por reemplazo y/o aumento, temporal o definitivo, por todo el periodo de duración del contrato. Dicha garantía deberá tener las siguientes coberturas:

            1.- Una cobertura de 36 meses de garantía en piezas, partes y componentes de los equipos.
            2.- Una cobertura de 36 meses por mano de obra técnica, en caso de reparación o cambio de alguno de los elementos mencionados en el punto 4.
            3.- Una cobertura de. 36 meses de atención de la garantía en las dependencias de la Universidad.
            '],
            [7,'7','Septima','La duración del contrato será de 36 meses, contados desde la fecha de notificación de la total tramitación del acto administrativo que apruebe el contrato.'],
            [8,'8','Octavo','La Universidad producto de sus necesidades y requerimientos podría solicitar a la empresa la incorporación de hardware menor de su propiedad a uno o más equipos incluidos en el presente contrato, ya sea que lo tenga en la actualidad o lo adquiera con posterioridad a la contratación, por lo cual la empresa debe establecer la forma de operar en esta situación. Entre las alternativas a considerar está que la empresa faculte a la Universidad a intervenir el equipo para que ésta realice la instalación del hardware menor, o bien, que el efectúe la instalación directamente con su personal de soporte a petición de la Universidad. Cabe destacar que la situación descrita tiene una ocurrencia muy baja o menor y generalmente se refiere a la instalación de tarjetas para periféricos varios. Estos eventos no tendrán costos para la Universidad.'],
            [9,'9','Decimo','La cantidad de equipos arrendados podrá aumentarse durante la vigencia del contrato, a requerimiento de la Universidad hasta en un 30%, en las mismas condiciones pactadas originalmente y sólo por el tiempo que reste del acuerdo original.'],
            [10,'10','Decimo primero','El precio que la Universidad del Sur, pagará a la empresa Opciones S.A. Sistema de Información, RUT 000000000, por la contratación del suministro de arriendo de Computadores Desktops para la Universidad del Sur", será la suma mensual, única y no reajustable por cada equipo de arriendo de 0,78 UF (cero coma setenta y ocho unidades de fomento) más !.V.A. para perfil 1 y de 0,85 UF (cero coma ochenta y cinco unidades de fomento) más I.V.A. para perfil 2.'],
            [11,'11','Decimo segundo','El pago del servicio comprenderá la totalidad de los servicios ejecutados efectivamente conforme al contrato, y se efectuará mensualmente, por mes vencido. En el caso que no exista continuidad del servicio de acuerdo a lo indicado

            En la cláusula séptima del presente contrato, se descontará del valor total mensual a pagar, el valor correspondiente al valor día renta, el que se determinará dividiendo el monto mensual correspondiente al mes en que se incurrió en incumplimiento en 30 días, cualquiera sea el número de equipos involucrados.
            
            El pago por el servicio se efectuará dentro de los 45 días siguientes a la recepción conforme del correspondiente documento tributario, sea en soporte papel o electrónico, debidamente autorizado por el Servicio de Impuestos Internos.
            
            Para los efectos contemplados en el artículo 3º de la Ley Nº 19.983, la Universidad del Sur, podrá reclamar del contenido de la factura o de la guía de despacho, en su caso, dentro de los treinta días corridos siguientes a la recepción del documento respectivo. Dicho reclamo, deberá ser puesto en conocimiento del emisor de la factura por carta certificada, o por cualquier otro modo fehaciente, conjuntamente con la devolución de la factura y la guía o guías de despacho, o bien junto con la solicitud de emisión de la nota de crédito correspondiente. El reclamo se entenderá practicado en la fecha de envío de la comunicación.
            
            Para dicho pago, las partes acuerdan que sólo para efectos de facilitar la obligación de pago del precio, podrá hacerse en su equivalente en pesos al momento de la fecha de facturación.
            
            La empresa deberá entregar, si fuere en formato papel, su factura en Oficina de Partes o Bodega Central, y si fuere en formato electrónico, deberá ser enviada a la dirección de correo facturasconcepcion@udsur.cl
            
            La empresa al momento de presentar la factura deberá presentar un certificado de cumplimiento de obligaciones Laborales y Previsionales otorgado por la Dirección del Trabajo, emitido con una antigüedad no mayor a treinta días a la fecha de su presentación, y que dé cuenta del cumplimiento de dichas obligaciones con sus actuales trabajadores o trabajadoras contratados en los dos últimos años contados hacia atrás desde la fecha de presentación de dicho certificado.
            La Universidad no realizará ningún pago mientras dicho certificado no sea presentado.
            '],
            [12,'12','Decimo tercer','Para garantizar el fiel cumplimiento de todas y cada una de las obligaciones del presente contrato, la empresa hace entrega de la Boleta de Garantía Nº 0471347, pagadera a la vista y con el carácter de irrevocable del Banco de Crédito e Inversiones, por un valor de $10.000.000.- (diez millones de pesos), con vigencia al 15 de junio de 2018.

            La Universidad hará devolución de la garantía de fiel cumplimiento del contrato al contratista, transcurrido el plazo de 60 días hábiles contados desde el término del plazo de ejecución del contrato. El instrumento en que conste la garantía podrá ser retirado por el contratista, transcurrido el plazo señalado, en las oficinas del Departamento de Contabilidad y Cobranzas, a su requerimiento.

            De acuerdo a lo dispuesto en el artículo 11 de la Ley Nº 19.886, esta garantía comprenderá, además, el aseguramiento del pago de las obligaciones laborales y sociales con los trabajadores del contratante por parte de éste, sin perjuicio de lo dispuesto en el artículo 20 de la Ley N 17.322.-'],
            [13,'13','Decimo cuarto','Serán causales de término anticipado del contrato:
            a)	Resciliación o Mutuo Acuerdo entre los contratantes.
            b)	Quiebra o insolvencia de la empresa, debidamente apreciada por la Universidad, a menos que se mejoren las cauciones entregadas para garantizar el cumplimiento del contrato. En este caso, la Universidad del Sur podrá exigir una caución equivalente hasta el 100% del valor del contrato incluida todas sus modificaciones
            c)	Por pérdida del dominio de los bienes arrendados, dado a que el mantener el dominio de dichos bienes será una obligación del contratante y su incumplimiento permitirá hacer efectiva la garantía del fiel cumplimiento del contrato.
            d)	Gravar las especies arrendadas durante la ejecución del contrato.
            e)	La cesión del contrato.
            f)	Por decisión unilateral de la Universidad, en caso de no iniciar la empresa el suministro de arriendo de computadores, por causa que le sea imputable, dentro del plazo máximo de entrega estipulado en el contrato, contados desde la fecha de suscripción del mismo.
            g)	El que así lo exija el interés público o la seguridad nacional.
            h)	Cuando no exista continuidad del servicio al fallar un equipo o alguna de sus partes, el proveedor no la repara y/o cambia y/o retorna posteriormente a la Universidad en condiciones para mantener el equipo funcionando en forma óptima.
            
            De esta manera, la Universidad mediante acto administrativo fundado podrá declarar resuelto administrativamente el contrato con cargo en los términos señalados en el punto 19.2 de las bases de licitación las que para todos los efectos legales se entiende formar parte del presente contrato. La dictación del acto administrativo deberá hacerse, previa tramitación del procedimiento administrativo que correspondiere, sin forma de juicio, haciéndose efectivas de inmediato todas las garantías que obren en su poder en los siguientes casos:
            
            a)	Si la empresa, por causa que le sea imputable, no iniciare el suministro dentro del plazo máximo de entrega estipulado en el presente contrato.
            b)	Cuando no exista continuidad del servicio por más de 24 horas cronológicas, según lo indicado en la cláusula séptima del presente contrato, comunicada por la Dirección de Informática al Departamento Servicios Generales y Patrimonio.
            c)	En los casos señalados en las letras c, d, e y f de la presente cláusula.
            
            Resuelto administrativamente el contrato en los términos indicados en el presente numerando, la Universidad quedará facultada para suspender el pago del servicio y para retener todo pago que estuviere pendiente y toda y cualquier otra suma de dinero que se le adeudare a la empresa con ocasión del contrato. Igualmente podrá hacer efectivas todas las garantías vigentes, de cualquier naturaleza, que hayan sido entregadas para caucionar el contrato de arriendo de computadores Desktops para la Universidad del Sur.
            
            De resultar un saldo a favor de la empresa, se le restituirá, dictando previamente al efecto el acto administrativo que sancione la liquidación pertinente. Si de la liquidación se obtiene un saldo en contra del oferente, éste tendrá un p!azo de treinta (30) días, contados desde la fecha de notificación de la resolución que aprueba la liquidación contable, pélra ingresar en arcas de la Universidad el total adeudado. Vencido dicho plazo, la Universidad podrá iniciar las acciones judiciales que procedan.
            '],
            [14,'14','Decimo quinto','Se aplicará una multa equivalente a dos veces el valor día renta, dividiendo el monto mensual correspondiente al mes en que se incurrió en incumplimiento en 30 días, cualquiera sea el número de equipos involucrados, y sin perjuicio de la facultad de la Universidad de poner término anticipado, al contrato en los siguientes casos:

            1.- Atraso en el plazo de entrega de los computadores. La fecha de entrega se acreditará con el documento de recepción conforme indicado en la cláusula quinta del presente contrato. Si producto del atraso en la entrega comprometida por el oferente, la Universidad no puede devolver a tiempo los equipos del contrato que está finalizando, el oferente será el responsable de los costos -si existen- del sobre uso de los equipos salientes que no se reemplazaron a tiempo.
            
            2.- Continuidad del servicio. Para estos efectos las partes acuerdan que se entenderá que no existe continuidad del servicio cuando fallando un equipo o alguna de sus partes el proveedor no la repara y/o cambia y/o retorna posteriormente a la Universidad en condiciones para mantener el equipo funcionando en forma óptima. El tiempo de solución no podrá superar las 2 horas. Transcurrido dicho plazo se entenderá falta en la continuidad del servicio y se hará exigible la multa correspondiente. El valor de la multa se aplicará cualquiera que sea el número de equipos involucrados, todo ello sin perjuicio del descuento establecido en la cláusula décima primera del presente contrato.
            
            Todas y cada una de las sanciones antes señaladas, serán aplicadas administrativamente mediante acto administrativo fundado previa tramitación del procedimiento administrativo que correspondiere y se deducirán del o los pagos mensuales más próximos, de las retenciones, de las garantías vigentes o de cualquier otro valor que se le adeudare a la empresa, relacionado con el contrato suscrito por el Arriendo de Computadores Desktops para la Universidad del Sur. Dicho acto administrativo será impugnable a través del recurso de reposición ante la autoridad que lo haya emitido, en conformidad con lo dispuesto en el artículo 1Oº de la Ley Nº 18.575, Orgánica Constitucional sobre Bases Generales de la Administración del Estado, y lo dispuesto en la Ley Nº 19.880, sobre Bases de los Procedimiento Administrativos que rigen los actos de los Órganos de la Administración del Estado, en lo que fuere aplicable.
            
            La correcta ejecución del contrato será supervisada por la Universidad del Sur, a través del Jefe del Departamento de Servicios Computacionales o quien lo subrogue.
            '],
            [15,'15','Decimo sexto','La personería del señor AAAAAA AAAAA para actuar por la Universidad del Sur en este contrato, consta en el Decreto Universitario Nº 180 de 2014 y en Resolución Universitaria Nº 01 de 2005.

            La personería de don Miguel Oberreuter Lavín para representar a Opciones S.A. Sistemas de Información, emana de Acta de Reunión de Directorio, con fecha 05 de abril de 2011, ante don Edward Langlois Danks, Notario Público de Puerto Montt y anotada bajo el Repertorio número 863.
            '],
            [16,'16','Decimo septimo','Para todos los efectos legales que emanen del presente contrato las partes fijan domicilio especial y único en la ciudad de Concepción y se someten a la jurisdicción de sus Tribunales de Justicia.

            Las partes suscriben el presente contrato en tres ejemplares del mismo tenor, quedando dos de ellos en poder de la Universidad y siendo el tercero para la empresa.
            Para constancia firman:
            ']
        ];
        $clausulas = array_map(function ($clausula) use ($now){
            return[
                'id_clausula' => $clausula[0],
                'n_clausula' => $clausula[1],
                'titulo' => $clausula[2],
                'Contenido' => $clausula[3],
            ];
    
        },$clausulas);
    
        \DB::table('clausulas')->insert($clausulas);
    }
}