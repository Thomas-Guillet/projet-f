import Navbar from '../../components/Ui/NavBar/NavBar';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Home from '../Home/Home';
import Threads from '../Threads/Threads';

function Website() {
    return (
        <div>
            <Navbar/>
            <div className="container">
                <Routes>
                    <Route path="/" element={<Home />} />
                    <Route path="/threads" element={<Threads />} />
                </Routes>
            </div>
        </div>
    );
}

export default Website;