import React from 'react';
import { createRoot } from 'react-dom/client';

class PageName extends React.Component {
    constructor(props) {
        super(props);
        this.state = { name: this.props.name};
    }
    render() {
        return (
            <h1 className="text-center font-bold text-xl">{this.props.name}</h1>
        );
    }
}

export default PageName;