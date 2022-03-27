import './App.css';
import Website from './containers/Website/Website';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom'

function App() {
  return (
      <Router>
        <Website />
      </Router>
  );
}

export default App;
