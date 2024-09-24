import { render, screen} from '@testing-library/react';
import React from "react";
import HelloWorld from "./HelloWorld";

describe('<HelloWorld />', () => {

    it('says hello', async () => {
        await render(<HelloWorld/>)
        const message = await screen.queryByText('Hello world');
        expect(message).toBeInTheDocument();
    })
});
