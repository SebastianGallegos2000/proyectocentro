
class rutValidador()
{

    constructor(rut) 
    {
        this.rut = rut;
        this.dv = dv;
        this.esValido = this.validarRut();
    }

    validarRut() 
    {
        let numerosArray = this.rut.split('-')[0].reverse();
        let acumulador = 0;
        let multiplicador = 2;
        for (let i = 0; i < numerosArray.length; i++) 
        {
            acumulador += parseInt(i) * multiplicador;
            multiplicador++;

            if (multiplicador == 8) 
            {
                multiplicador = 2;  
            }
        }
        let dv = 11 - (acumulador % 11);

        if (dv == 11) 
        {
            dv = '0';
        }
        if (dv == 10) 
        {
            dv = 'K'.toLowerCase();
        }
        return dv == this.dv.toLowerCase();
    }
}