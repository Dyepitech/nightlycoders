import React from 'react';
import { createRoot } from 'react-dom/client';
import StepOne from './components/StepOne.jsx';
import Devis from './components/Devis.jsx';

export default function App(){
    return(
        <div className="flex justify-center">
            <Devis></Devis>
        </div>
    );
}

if(document.getElementById('root')){
    createRoot(document.getElementById('root')).render(<App />)
}