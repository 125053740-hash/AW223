import Estudiante from "./components/estudiante"; 
import './App.css';
export default function App(){
const estudiantes = [
    {id:1, nombre: "Juan", carrera: "Ingeniería"},
    {id:2, nombre: "María", carrera: "Medicina"},
    {id:3, nombre: "Pedro", carrera: "Derecho"},
];
 return(
  <main className="contenedor">
    <h1>Lista de Estudiantes</h1>
    <form action=""></form>
    <form>
      <input type="text" placeholder="Nombre"/>
      <input type="text" placeholder="Carrera"/>
      <button type="button">Agregar</button>
    </form>
    <h2>Estudiantes Registrados</h2>
    <ul>
      {estudiantes.map((estudiante) => (
        <Estudiante key={estudiante.id} estudiante={estudiante}/>
      ))}
    </ul>
    <p>Total de estudiantes: {estudiantes.length}</p>
  </main>
);
}