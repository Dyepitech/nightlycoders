import React from 'react';
import { createRoot } from 'react-dom/client';
import PageName from './PageName.jsx';

class StepOne extends React.Component {
    constructor(props) {
        super(props);
        this.state = {};
    }
    render() {
        return (
            <div className="flex justify-center w-full">
                <form className="mt-5 bg-white p-10 rounded-md w-full" >
                <PageName name="Generateur de devis"></PageName>
                    <div className="flex justify-center">
                        <div className="mb-5 mt-5 mr-5">
                            <label for="firstname" className="font-bold mb-1 text-gray-700 block">Prénom</label>
                            <input type="text"
                                className="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                placeholder="Entrez votre prénom..." />
                        </div>
                        <div className="mb-5 mt-5">
                            <label for="lastname" className="font-bold mb-1 text-gray-700 block">Nom</label>
                            <input type="text"
                                className="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                placeholder="Entrez votre nom..." />
                        </div>
                    </div>
                </form>
            </div>
        );
    }
}

export default StepOne;


