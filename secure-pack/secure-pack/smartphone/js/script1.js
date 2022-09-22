/*
 * Desenvolvido por CaffeineDev Softwares e Sites
 * Criado por Douglas Horvath
 */
package Classes;

import Banco.Conecta;
import Resources.Patterns;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.time.LocalDate;
import java.time.LocalTime;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.util.converter.LocalDateStringConverter;

/**
 *
 * @author Douglas Horvath
 */
public class Paciente {
    
    private int id;
    private String nome;
    private String cpf;
    private String rua;
    private int numero;
    private String bairro;
    private String cidade;
    private String estado;
    private String cep;
    private int cod_externo;
    private LocalDate data;
    private LocalTime hora;
    private ArrayList<Plano> planos;
    
    

    public Paciente(String nome) {
        this.nome = nome;
        
        id = -1;
        cpf = null;
        rua = null;
        numero = -1;
        bairro = null;
        cidade = null;
        estado = null;
        cep = null;
        cod_externo = -1;
        data = null;
        hora = null;
        planos = null;
    }