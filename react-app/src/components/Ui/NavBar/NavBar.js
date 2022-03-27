import logo from '../../../assets/img/logo.jpg'
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom'

function Navbar() {
    return (
        <nav className="navbar navbar-expand-lg navbar-light bg-light">
          <div className="container-fluid">
          <Link className="navbar-brand" to="/">
          <img src={logo} alt="logo projet f" width="50px" />
            Projet F
          </Link>
            <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
              <span className="navbar-toggler-icon"></span>
            </button>
        
            <div className="collapse navbar-collapse" id="navbarColor03">
              <ul className="navbar-nav me-auto">
                <li className="nav-item">
                  <Link className="nav-link" to="/">
                    Home
                  </Link>
                </li>
                <li className="nav-item">
                  <Link className="nav-link" to="/threads">
                  Threads
                  </Link>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    )
}

export default Navbar