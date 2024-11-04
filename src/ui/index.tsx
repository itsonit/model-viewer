import { Observer } from '@playcanvas/observer';
import React from 'react';
import ReactDOM from 'react-dom';
import { Container, Spinner } from '@playcanvas/pcui/react';

import { ObserverData } from '../types';
import LeftPanel from './left-panel';
import SelectedNode from './selected-node';
import PopupPanel from './popup-panel';
import LoadControls from './load-controls';
import ErrorBox from './errors';
import { version as appVersion } from '../../package.json';

class App extends React.Component<{ observer: Observer }> {
    state: ObserverData = null;
    canvasRef: any;

    constructor(props: any) {
        super(props);

        this.canvasRef = React.createRef();
        this.state = this._retrieveState();

        props.observer.on('*:set', () => {
            // update the state
            this.setState(this._retrieveState());
        });
    }

    _retrieveState = () => {
        const state: any = {};
        (this.props.observer as any)._keys.forEach((key: string) => {
            state[key] = this.props.observer.get(key);
        });
        return state;
    };

    _setStateProperty = (path: string, value: string) => {
        this.props.observer.set(path, value);
    };

    render() {
        return <div id="application-container">
            <div id='canvas-wrapper'>
                <canvas id="application-canvas" ref={this.canvasRef} />
                <SelectedNode sceneData={this.state.scene} />
                <PopupPanel observerData={this.state} setProperty={this._setStateProperty} />
                <ErrorBox observerData={this.state} />
                <Spinner id="spinner" size={30} hidden={true} />
            </div>
        </div>;
    }
}

export default (observer: Observer) => {
    // render out the app
    ReactDOM.render(
        <App observer={observer}/>,
        document.getElementById('app')
    );
};
