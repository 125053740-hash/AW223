import { useState } from 'react';
import { destinos } from './destinos';
import './App.css';


function TarjetaDestino(props) {
  const [verDetalles, setVerDetalles] = useState(false);

  
  function cambiarDetalles() {
    if (verDetalles === true) {
      setVerDetalles(false);
    } else {
      setVerDetalles(true);
    }
  }

  
  const esFavorito = props.favoritos.includes(props.destino.id);

  return (
    <div className="tarjeta">
      <img src={props.destino.imagen} alt={props.destino.nombre} />
      
      <div className="tarjeta-contenido">
        <span className="etiqueta">{props.destino.categoria}</span>
        <h3>{props.destino.nombre}</h3>
        <p className="ubicacion">📍 {props.destino.ubicacion}</p>
        <p className="precio">{props.destino.precio}</p>

        
        {verDetalles === true && (
          <p className="descripcion">{props.destino.descripcion}</p>
        )}

        <div className="botones">
          <button 
            className={esFavorito ? "btn-fav activo" : "btn-fav"}
            onClick={() => props.alternarFavorito(props.destino.id)}
          >
            {esFavorito ? " Quitar favorito" : " ❤️ Agregar favorito"}
          </button>

          <button className="btn-detalles" onClick={cambiarDetalles}>
            {verDetalles ? "Ocultar detalles" : "Ver detalles"}
          </button>
        </div>
      </div>
    </div>
  );
}


function App() {
  const [busqueda, setBusqueda] = useState("");
  const [favoritos, setFavoritos] = useState([]);
  const [soloFavoritos, setSoloFavoritos] = useState(false);

  
  function alternarFavorito(id) {
    if (favoritos.includes(id)) {
      // Si ya estaba, lo quitamos
      const nuevaLista = favoritos.filter((favId) => favId !== id);
      setFavoritos(nuevaLista);
    } else {
  
      setFavoritos([...favoritos, id]);
    }
  }

  
  const destinosFiltrados = destinos.filter((destino) => {
    const coincideTexto = destino.nombre.toLowerCase().includes(busqueda.toLowerCase()) ||
                          destino.ubicacion.toLowerCase().includes(busqueda.toLowerCase());
    
    if (soloFavoritos === true) {
      return coincideTexto && favoritos.includes(destino.id);
    }
    return coincideTexto;
  });

  return (
    <div className="contenedor-principal">
      
      <nav className="navbar">
        <div className="logo"> TravelApp</div>
        <div className="nav-links">
          <span>Inicio</span>
          <span>Destinos</span>
          <span>Favoritos</span>
        </div>
      </nav>

      
      <header className="banner">
        <h1>Descubre tu próximo destino</h1>
        <p>Explora lugares increíbles y planea tus próximas vacaciones.</p>
      </header>

      
      <section className="caja-contador">
        <div>
          <strong>Destinos favoritos</strong>
          <p>Tu próxima aventura comienza aquí</p>
        </div>
        <span className="numero-favoritos">{favoritos.length}</span>
      </section>

      
      <section className="seccion-busqueda">
        <h2>Explora destinos turísticos</h2>
        
        <input 
          type="text" 
          placeholder="Buscar destino turístico..." 
          value={busqueda}
          onChange={(e) => setBusqueda(e.target.value)}
          className="input-buscador"
        />

        <button 
          className="btn-mostrar-favs"
          onClick={() => setSoloFavoritos(!soloFavoritos)}
        >
          {soloFavoritos ? "Mostrar todos" : "Mostrar favoritos"}
        </button>
      </section>

      
      <main className="grid-destinos">
        {destinosFiltrados.map((destino) => (
          <TarjetaDestino 
            key={destino.id} 
            destino={destino} 
            favoritos={favoritos}
            alternarFavorito={alternarFavorito}
          />
        ))}
      </main>
    </div>
  );
}

export default App;